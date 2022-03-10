//validate login form
function validateLogin(){
    let usernameField = document.getElementById('username');
    let passwordField = document.getElementById('password');
    let errorField = document.getElementById('show-error');

    let usernameValue = usernameField.value;
    let passwordValue = passwordField.value;

    if (usernameValue === ""){
        errorField.innerHTML = "Please enter user name!";
        usernameField.focus();
        return false;
    }else if(passwordValue === ""){
        errorField.innerHTML = "Please enter password!";
        passwordField.focus();
        return false;
    }else{
        return true;
    }
}

//validate new employee form
function validateNewEmployee(){
    let employeeIDField = document.getElementById('employeeID');
    let employeeNameField = document.getElementById('employeeName');
    let employeeDepartmentField = document.getElementById('employeeDepartment');
    let employeeErrorField = document.getElementById('employee-show-error');

    let employeeIDValue = employeeIDField.value;
    let employeeNameValue = employeeNameField.value;
    let employeeDepartmentValue = employeeDepartmentField.value;

    if (employeeIDValue === ""){
        employeeErrorField.innerHTML = "Please enter employee ID!";
        employeeIDField.focus();
        console.log(1);
        return false;
    }else if(employeeNameValue === ""){
        employeeErrorField.innerHTML = "Please enter employee name!";
        employeeNameField.focus();
        console.log(2);
        return false;
    }else if(employeeDepartmentValue === ""){
        employeeErrorField.innerHTML = "Please enter employee's department!";
        employeeDepartmentField.focus();
        console.log(3);
        return false;
    }else{
        console.log(4);
        return true;
    }
}

//confirm dialog RESET EMPLOYEE PASSWORD
function confirmDialogReset() {
    confirm("Are you sure to reset this employee password to default?");
}

//confirm dialog DELETE EMPLOYEE
function confirmDialogDelete() {
    confirm("Are you sure to delete this employee?");
}

//confirm dialog LOGOUT
function confirmDialogLogout() {
    confirm("Are you sure to log out?");
}