const QRCode = require("qrcode")


let content = 
{
    name: "www.linkedin.com/in/efe-korumaz-1976432b3",
}

//zet data om naar een string
let stringData = JSON.stringify(content);

//print qrcode naar terminal
QRCode.toString(stringData,{type:'terminal'},function (err, QRcode)
{
    //foutmelding
    if(err) return console.log('er is iets misgegaan')
        //print qr-code in terminal
        console.log(QRcode)
})

QRCode.toDataURL(stringData, function(err, QRcode)
{
    if(err) return console.log("er is iets slecht")
        console.log(QRcode)
})

