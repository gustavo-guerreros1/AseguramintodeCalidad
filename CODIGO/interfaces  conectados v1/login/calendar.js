let monthNames = ['enero' , 'febrero' ,'marzo','abril','mayo',
'junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
 
let currentDate = new Date();
let currentDay = currentDate.getDate();
let monthNumber = currentDate.getMonth();
let currentYear = currentDate.getFullYear();


console.log(currentDate + '---' + monthNumber + '----' + currentYear);