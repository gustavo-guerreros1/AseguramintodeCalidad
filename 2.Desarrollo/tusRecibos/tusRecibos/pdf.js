function generarPDF(){
    const element = document.getElementById("recibos");
    html2pdf()
     .from(element)
     .save("TusRecibosDominio180");
}