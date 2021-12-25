
function saveContact() {
    var x = window.confirm('Do you want to save contact?');
    if (x == true) {
        let confirmSubmission = document.getElementById('saveButton');
        confirmSubmission.setAttribute('name', 'saveButton');
        //window.alert('Contact saved successfully');
    } else {
        window.alert('Contact not saved');
    }
}


function resetForm() {
    let resetForm = document.getElementById('saveButton');
    resetForm.removeAttribute('name');
}