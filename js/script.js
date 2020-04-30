// Sumbit changes to form, default to GET
function formChange(type = "GET") {
  let element = document.getElementById("form-change");
  // Set type to GET/POST
  element.method = type;
  // Submit form
  element.submit();
}

// Set all filter selections to default
function clearFilters() {
  document.getElementById("authorID").value = 0;
  document.getElementById("categoryID").value = 0;
  // Submit changes
  this.formChange();
}

function openSubmit() {
  document.getElementById("filter-grp").style.display = "none";
  document.getElementById("quote-container").style.display = "none";
  document.getElementById("submit-grp").style.display = "block";
}
function closeSubmit() {
  document.getElementById("filter-grp").style.display = "block";
  document.getElementById("quote-container").style.display = "block";
  document.getElementById("submit-grp").style.display = "none";
}

function checkValid(submit = false) {
  let count = 0;
  document.getElementById("categoryIDSubmit").value == 0 ? count++ : "";
  document.getElementById("authorIDSubmit").value == 0 ? count++ : "";
  document.getElementById("textsubmit").value.length < 10 ? count++ : "";
  if (count == 0) {
    document.getElementById("submit-quote-btn").classList.remove("disabled");
    document.getElementById("warning").innerHTML = "";
  } else {
    document.getElementById("submit-quote-btn").classList.add("disabled");
    
  }
  if (submit == true) {
    if (count == 0) {
      formChange("POST");
    } else {
      document.getElementById("warning").innerHTML = "Must Complete Form";
    }
  }   
}
