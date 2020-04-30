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