function regValidate() {
  const firstname = document.forms["reg-form"]["firstname"];
  const lastname = document.forms["reg-form"]["lastname"];
  const email = document.forms["reg-form"]["email"];
  const password = document.forms["reg-form"]["password"];

  if (firstname.value == null || firstname.value == "") {
    alert("firstname can't be empty");
    firstname.focus();
    return false;
  }
  if (lastname.value == null || lastname.value == "") {
    alert("lastname can't be empty");
    lastname.focus();

    return false;
  }
  if (email.value == null || email.value == "") {
    alert("email can't be empty");
    email.focus();

    return false;
  }
  if (password.value == null || password.value == "") {
    alert("password can't be empty");
    password.focus();
    return false;
  }
  return true;
}

function loginValidate() {
  const email = document.forms["login-form"]["email"];
  const password = document.forms["login-form"]["password"];

  if (email.value == null || email.value == "") {
    alert("email can't be empty");
    email.focus();

    return false;
  }
  if (password.value == null || password.value == "") {
    alert("password can't be empty");
    password.focus();

    return false;
  }
  return true;
}

function editValidate() {
  const firstname = document.forms["edit-form"]["firstname"];
  const lastname = document.forms["edit-form"]["lastname"];
  const email = document.forms["edit-form"]["email"];
  const password = document.forms["edit-form"]["password"];
  const status = document.forms["edit-form"]["status"];

  if (firstname.value == null || firstname.value == "") {
    alert("firstname can't be empty");
    firstname.focus();
    return false;
  }
  if (lastname.value == null || lastname.value == "") {
    alert("lastname can't be empty");
    lastname.focus();

    return false;
  }
  if (email.value == null || email.value == "") {
    alert("email can't be empty");
    email.focus();

    return false;
  }
  if (password.value == null || password.value == "") {
    alert("password can't be empty");
    password.focus();
    return false;
  }
  if (status.selectedIndex < 1) {
    alert("status can't be empty");
    status.focus();
    return false;
  }
  return true;
}
