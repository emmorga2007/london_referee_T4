let errorCodes = {
    404: "URL Not Found",
    500: "Server Error. Try again later",
    403: "Access Denied.",
    503: "Server Error. Try Again Later"
}


async function fetchData(sourceURL) {
    let resource = await fetch(sourceURL).then(response => {
        if (response.status !== 200) {
            throw new Error(`Who the Hell is Will Robinson? ${response.status}: ${errorCodes[response.status]}`);
        }
        return response;
    });

    let dataset = await resource.json();

    return dataset;
}

async function postData(sourceURL) {
    return "You are using the postData API endpoint";
}


export { fetchData };