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
        <td> <input type="checkbox" name="checked" ${isCehecked}> </td>        
        <td> <a class="btn btn-secondary"  href="update.php/${response[i].id}">Update</a> </td>
        <td><button class="button_delete, btn btn-secondary" data-id="${response[i].id}"  > Delete </button>    </td></tr>
        `
        }

    }
    document.querySelector(".tbody").innerHTML = output;
    hooks()
}

function fetchData() {
    const data = {
        type: "GetData"
    };
    doRequest(data, getDataCallBack)
}

function deleteDataCallBack(resp){
    if(resp.Response=== true){
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

function hooks(){
    $(".button_delete").on("click",ev => {
        deleteData(ev.currentTarget.dataset.id)
    } )

}
fetchData();
