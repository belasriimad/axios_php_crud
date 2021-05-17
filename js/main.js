    const contactId = document.getElementById('id');
    const contactNom = document.getElementById('nom');
    const contactTel = document.getElementById('tel');
    const results = document.getElementById('results');
    const form = document.getElementById('add-form');
    const updateButton = document.getElementById('updateBtn');
    const addButton = document.getElementById('addBtn');
    const messageBox = document.getElementById('message');

    addButton.addEventListener('click',addContact);
    //get contacts
    document.addEventListener('DOMContentLoaded',getContacts);
    //add contact
    function addContact(){
        if(contactNom.value != "" && contactTel.value != ""){
            axios.post('http://localhost/axios-contacts-app/add.php', {
                nom: contactNom.value,
                tel: contactTel.value
            })
            .then(function (response) {
                // results.innerHTML = response.data;
                getContacts();
                contactNom.value = '';
                contactTel.value = '';
                messageBox.innerHTML = `
                    ${response.data}
                `;
            })
            .catch(function (error) {
                console.log(error);
            });
        }else{
            messageBox.innerHTML = `
                <div class="alert alert-danger">Fill all the fields</div>
            `;
        }
        
    }
    //get contacts
    function getContacts(){
        axios.get('http://localhost/axios-contacts-app/get-contacts.php',)
        .then(function (response) {
            // results.innerHTML = response.data;
            //console.log(response.data);
            results.innerHTML = `
                <table class="table table-responsive table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${response.data}
                    </tbody>
                </table>       
            `;
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    //get single contact
    function getContact(id){
        axios.post('http://localhost/axios-contacts-app/get-contact.php',{       
            id: id
        })
        .then(function (response) {
            contactNom.value = response.data.name;
            contactTel.value = response.data.tel;
            contactId.value = response.data.id;
            updateButton.style.display = "block";
            addButton.style.display = "none";
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    //update contact
    updateButton.addEventListener('click',function(){
        axios.put('http://localhost/axios-contacts-app/update.php', {
            id: contactId.value,
            nom: contactNom.value,
            tel: contactTel.value
        })
        .then(function (response) {
            // results.innerHTML = response.data;
            getContacts();
            contactNom.value = '';
            contactTel.value = '';
            updateButton.style.display = "none";
            addButton.style.display = "block";
            messageBox.innerHTML = `
                ${response.data}
            `;
        })
        .catch(function (error) {
            console.log(error);
        });
    });
    //delete contact
    function deleteContact(id){
        axios.post('http://localhost/axios-contacts-app/delete.php', {
             id:id
        })
        .then(function (response) {
            // results.innerHTML = response.data;
            getContacts();
            messageBox.innerHTML = `
                ${response.data}
            `;
        })
        .catch(function (error) {
            console.log(error);
        });
    }