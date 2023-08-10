const paramTemplateRegex = /^\[(\w+)\]$/

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