function doRequest(data, callBack) {

    $.ajax({
        type: "POST",
        url: 'apiAjax.php',
        data: data,
        dataType: 'json'
    }).done(callBack);

}

function getDataCallBack(response) {
    let output = '';
    for (let i in response) {
        let isCehecked = "";
        if (response[i].done === "0") {
            isCehecked = "checked"
        }
        if (response[i].deleted === "0") {
            console.log("deleted");
        } else if (response[i].deleted === "1") {
            output += `
        <tr>
        <th scope='row'>${response[i].id}</th>
        <td>${response[i].name}</td>
        <td>${response[i].description}</td>
        <td>${response[i].duedate}</td>
        <td>${response[i].image}</td>
        <td> <input type="checkbox" class="checkBox" name="checked" ${isCehecked} data-id="${response[i].id}"> </td>        
        <td> <a class="btn btn-secondary"  href="update.php/${response[i].id}">Update</a> </td>
        <td><button class="button_delete" data-id="${response[i].id}"  > Delete </button>    </td></tr>
        `
        }

    }
    document.querySelector(".tbody").innerHTML = output;
    hooks()
    updateCheckBox()
}

function fetchData() {
    const data = {
        type: "GetData"
    };
    doRequest(data, getDataCallBack)
}

function deleteDataCallBack(resp){

    if(resp.Response === true){
        fetchData();
    }

}

function deleteData(id){
    const data = {
        type: 'DeleteData',
        id: id
    }
    doRequest(data,deleteDataCallBack);
}

function checkDone(id){
    const data = {
        type: "CheckDone",
        id:id
    }
    doRequest(data, fetchData)
}


function hooks(){
    $(".button_delete").on("click",ev => {
        deleteData(ev.currentTarget.dataset.id)
    } )

}

function updateCheckBox(){
    $(".checkBox").on("click", ev => {
       checkDone(ev.currentTarget.dataset.id)
    })
}

fetchData();
