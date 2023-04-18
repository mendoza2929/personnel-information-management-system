function get_retired_personnel(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/new_personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
     document.getElementById('retired_personnel_data').innerHTML = this.responseText;
    }
    xhr.send('get_retired_personnel');
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


function search_retired_personnel(newpersonnelname){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/new_personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('retired_personnel_data').innerHTML = this.responseText;
    }
    xhr.send('search_retired_personnel&name='+newpersonnelname);
}







// function search_active_personnel(newpersonnelname){
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST","./ajax/new_personnel.php",true);
//     xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

//     xhr.onload = function(){
//         document.getElementById('retired_personnel_data').innerHTML = this.responseText;
//     }
//     xhr.send('search_active_personnel&name='+newpersonnelname);
// }



window.onload = function(){
    get_retired_personnel();
}

