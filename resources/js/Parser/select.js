export default function selects(options, separator){
    let array = [];
    options.forEach(element => {
        let parts = element.toString().split(separator);
        array.push({key: parts[0], value: parts[1]})
    });
    return array;
}


