import { addRootEventListener } from "./dom";

const pageCache: {[path: string]: string} = {}

const paramTemplateRegex = /^\[(\w+)\]$/

/** take a route and return an object keyed by the name in a given template (i.e. /thing/[id]) */
export const getParamsFromRoute = <T extends Record<string,string>>(template: string) => {
    const currentPath = window.location.pathname;

    const currentPathParts = currentPath.split('/')
    const templateParts = template.split('/')

    let output = {}

    for (let index = 0; index < templateParts.length; index++){
        const currentPathPart = currentPathParts[index]
        const templatePart = templateParts[index]

        const matches = templatePart.match(paramTemplateRegex)
        const key = matches?.[1]

        if (key){
            output = {...output, [key] : currentPathPart}
        } else if (currentPathPart !== templatePart){
            return null
        }
    }

    return output as T;
}

/** request html from the server for a view at a given path (or return html from the cache) */
const getHtmlForPath = async (path: string) => {
    if (pageCache[path]){
        return pageCache[path]
    }     

    const response = await fetch(`/view${path}`)
    const responseHtml = await response.text()

    pageCache[path] = responseHtml;

    return responseHtml;
}

/** update the current html with the given */
const updateRouter = async () => {
    const path = location.pathname;
    const entry = document.querySelector('main#entry');

    if (!pageCache[path]){
        entry.innerHTML = 'loading...';
    }

    const html = await getHtmlForPath(path);
    
    entry.innerHTML = html;
}

/** navigate to a new path */
export const navigate = async (path: string, replace?: boolean) => {
    if (replace){
        history.replaceState({}, '', path)
    } else {
        history.pushState({}, '', path)
    }
    await updateRouter()
}

/** initalise all router logic */
export const initialiseRouter = () => {
    // override click events on anchor tags
    addRootEventListener('a', 'click', (event, element) => {
        event.preventDefault();
        const href = element.getAttribute('href');
        navigate(href);
    })
    
    // ensure popstate events trigger updates
    window.addEventListener('popstate', updateRouter)
}