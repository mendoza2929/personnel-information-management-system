function get_view_training_personnel(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/new_personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
     document.getElementById('view_personnel_data').innerHTML = this.responseText;
    }
    xhr.send('get_view_training_personnel');
}

   
function personnel_course(id){
        // add_form_course.elements['personnel_id'].value = id;
        // add_form_course.elements['batch'].value= '';
        // add_form_course.elements['course'].value= '';
    // add_form_course.elements['start'].value= '';
    // add_form_course.elements['end'].value= '';

    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('course-data').innerHTML = this.responseText;
    }

    xhr.send('get_course='+id);
}






function search_view_personnel(newpersonnelname){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/new_personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('view_personnel_data').innerHTML = this.responseText;
    }
    xhr.send('search_view_personnel&name='+newpersonnelname);
}


// function printCertificate(imageSrc) {
//     var certificateImg = document.getElementById('certificate-img');
//     certificateImg.src = imageSrc;
//     var win = window.open('', 'printWindow', 'height=400,width=600');
//     win.document.write('<html><head><title>Certificate</title></head><body style="text-align:center;">');
//     win.document.write('<img src="'+ certificateImg.src +'" />');
//     win.document.write('</body></html>');
//     win.document.close();
//     win.print();
// }






window.onload = function(){
    get_view_training_personnel();
}

