import { addRootEventListener } from "./dom";

export namespace Router {
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
    const getViewMarkup = async (path: string) => {
        if (pageCache[path]){
            return pageCache[path]
        }     

        const response = await fetch(`/view${path}`)
        const responseHtml = await response.text()

        pageCache[path] = responseHtml;

        return responseHtml;
    }

    /** slight hack to ensure scripts execute after page changes (scripts made using innerHTML = * don't execute) */
    const fixScripts = () => {
        const entry = document.querySelector('main#entry');

        entry.querySelectorAll('script').forEach(script => {
            const newScript = document.createElement('script');
            newScript.text = script.innerHTML;
            for (let index = 0; index < script.attributes.length; index++){
                newScript.setAttribute(script.attributes.item(index).name, script.attributes.item(index).value)
            }
            script.parentNode.replaceChild(newScript, script)
        })
    }

    /** update the current html with the given */
    const updateRouter = async () => {
        const path = location.pathname;

        const entry = document.querySelector('main#entry');

        if (!pageCache[path]){
            entry.innerHTML = 'loading...';
        }

        const html = await getViewMarkup(path);
        
        entry.innerHTML = html;
        fixScripts()
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
    export const init = () => {
        // override click events on anchor tags
        addRootEventListener('a', 'click', (event, element) => {
            const href = element.getAttribute('href');

            if (href[0] === '/'){
                event.preventDefault();
                navigate(href);
            }
        })
        
        // ensure popstate events trigger updates
        window.addEventListener('popstate', updateRouter)
    }
}