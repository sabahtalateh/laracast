var fs = require('fs')
var dir = process.argv[2]
var extToShow = process.argv[3]

var dirContent = fs.readdir(dir, function(err, list) {
    var ext


    list.forEach(function(element) {
        var splited = element.split('.')
        ext = splited[1]
        if (ext == extToShow) {
            console.log(element)
        }

    })
})
