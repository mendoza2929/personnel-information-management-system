let personnel_form = document.getElementById('personnel_form')

personnel_form.addEventListener('submit', function(e){
    e.preventDefault();
    add_personnel();
});


function add_personnel(){
    let data = new FormData();
    data.append('add_personnel','');
    data.append('rank',personnel_form.elements['rank'].value);
    data.append('unit',personnel_form.elements['unit'].value);
    data.append('last',personnel_form.elements['last'].value);
    data.append('first',personnel_form.elements['first'].value);
    data.append('middle',personnel_form.elements['middle'].value);
    data.append('suffix',personnel_form.elements['suffix'].value);
    data.append('street',personnel_form.elements['street'].value);
    data.append('address',personnel_form.elements['address'].value);
    data.append('city',personnel_form.elements['city'].value);
    data.append('province',personnel_form.elements['province'].value);
    data.append('gender',personnel_form.elements['gender'].value);
    data.append('birthday',personnel_form.elements['birthday'].value);
    data.append('batch',personnel_form.elements['batch'].value);
    // data.append('course',personnel_form.elements['course'].value);


    let xhr  = new XMLHttpRequest();
    xhr.open("POST","./ajax/personnel.php",true);
    
    
    xhr.onload = function(){
        var myModalEl = document.getElementById('add-personnel')
        var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
        modal.hide();

        if(this.responseText==1){
            swal("Good job!", "You Successfully Create Personnel!", "success");
            personnel_form.reset();
            get_personnel();
            
        }else{
            swal("Error!", "Server Down!", "error");
        }

    }
    xhr.send(data);
}

function get_personnel(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
     document.getElementById('personnel_data').innerHTML = this.responseText;
    }
    xhr.send('get_personnel');
}





function toggleStatus(id,val){
    
    let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/personnel.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    
        xhr.onload = function(){
            if(this.responseText==1){
                // alert('success','Status Active');
                get_personnel();
            }
            else{
                alert('error','Status Not Active');
            }
        }
        xhr.send('toggleStatus='+id+'&value='+val);

}




let edit_personnel = document.getElementById('edit_personnel');

function personnel_details(id){

    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        edit_personnel.elements['rank'].value = data.personneldata.rank;
        edit_personnel.elements['unit'].value = data.personneldata.unit;
        edit_personnel.elements['last'].value = data.personneldata.last;
        edit_personnel.elements['first'].value = data.personneldata.first;
        edit_personnel.elements['middle'].value = data.personneldata.middle;
        edit_personnel.elements['suffix'].value = data.personneldata.suffix;
        edit_personnel.elements['street'].value = data.personneldata.street;
        edit_personnel.elements['address'].value = data.personneldata.address;
        edit_personnel.elements['city'].value = data.personneldata.city;
        edit_personnel.elements['province'].value = data.personneldata.province;
        edit_personnel.elements['gender'].value = data.personneldata.gender;
        edit_personnel.elements['birthday'].value = data.personneldata.birthday;
        edit_personnel.elements['batch'].value = data.personneldata.batch;
        // edit_personnel.elements['course'].value = data.personneldata.course;
        edit_personnel.elements['personnel_id'].value = data.personneldata.id;
   }

   xhr.send('edit_personnel='+id);
}


edit_personnel.addEventListener('submit',function(e){
    e.preventDefault();
    submit_edit_personnel();
});


function submit_edit_personnel(){
    let data = new FormData();
    data.append('submit_edit_personnel','');
    data.append('personnel_id',edit_personnel.elements['personnel_id'].value);
    data.append('rank',edit_personnel.elements['rank'].value);
    data.append('unit',edit_personnel.elements['unit'].value);
    data.append('last',edit_personnel.elements['last'].value);
    data.append('first',edit_personnel.elements['first'].value);
    data.append('middle',edit_personnel.elements['middle'].value);
    data.append('suffix',edit_personnel.elements['suffix'].value);
    data.append('street',edit_personnel.elements['street'].value);
    data.append('address',edit_personnel.elements['address'].value);
    data.append('city',edit_personnel.elements['city'].value);
    data.append('province',edit_personnel.elements['province'].value);
    data.append('gender',edit_personnel.elements['gender'].value);
    data.append('birthday',edit_personnel.elements['birthday'].value);
    data.append('batch',edit_personnel.elements['batch'].value);
    // data.append('course',edit_personnel.elements['course'].value);

    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/personnel.php",true);

    xhr.onload = function(){
        var myModalEl = document.getElementById('edit-personnel')
        var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
        modal.hide();

        if(this.responseText==1){
            swal("Good job!", "You Successfully Edit Personnel!", "success");
            edit_personnel.reset();
            get_personnel();
            
        }else{
            swal("Error!", "Server Down!", "success");
        }

    }
    xhr.send(data);


}


function search_personnel(personnelname){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/personnel.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('personnel_data').innerHTML = this.responseText;
    }
    xhr.send('search_personnel&name='+personnelname);
}

// function personnel_course(id){
    
        
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST","./ajax/personnel.php",true);
//     xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

//     xhr.onload = function(){
//         document.getElementById('course-data').innerHTML = this.responseText;
//     }

//     xhr.send('get_course='+id);
// }

// function printCertificate(imageUrl) {
//     var w = window.open('', 'Print Certificate');
//     w.document.write('<html><head><title>Print Certificate</title>');
//     w.document.write('</head><body style="text-align:center">');
//     w.document.write('<img src="' + imageUrl + '" style="max-width:100%">');
//     w.document.write('</body></html>');
//     w.print();
//     w.close();
// }



// Define the personnel_course and printCertificate functions
function personnel_course(id) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/personnel.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('course-data').innerHTML = this.responseText;
    }

    xhr.send('get_course=' + id);
}

// function printCertificate() {
//     var certImage = document.getElementById("cert-image");
//     var printWindow = window.open('', '_blank', 'width=800,height=600');
//     printWindow.document.write('<html><head><title>Certificate</title></head><body>');
//     printWindow.document.write(certImage.outerHTML);
//     printWindow.document.write('</body></html>');
//     printWindow.document.close();
//     printWindow.focus();
//     printWindow.print();
//     printWindow.close();
// }


window.onload = function(){
    get_personnel();
    // get_course();
}

