fetch('getData.php').then(res => res.json()).then(response => {

    console.log(response);
    let output = '';
    for(let i in response){
        let isCehecked = "";
        if(response[i].done === "0"){
            isCehecked = "checked"
        }
        if(response[i].deleted === "0"){
            console.log("deleted");
        }else if(response[i].deleted === "1") {
            output += `
        <tr>
        <th scope='row'>${response[i].id}</th>
        <td>${response[i].name}</td>
        <td>${response[i].description}</td>
        <td>${response[i].duedate}</td>
        <td>${response[i].image}</td>
        <td> <input type="checkbox" name="checked" ${isCehecked}> </td>        
        <td> <a class="btn btn-secondary"  href="update.php/${response[i].id}">Update</a> </td>
        <td> Delete</td></tr>
        `
        }

    }
    document.querySelector(".tbody").innerHTML = output;

}).catch(error => console.log(error));