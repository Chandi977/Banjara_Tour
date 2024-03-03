function myFunction(deletesuprem) {
  var r = confirm("Are you sure to Delete this order?");
  const deleteId = document.getElementById("delete-id").innerText;
  console.log(deleteId);
  if (r == true) {
    console.log(true);
    // const deleteA = document.createElement("a");
    deleteA.href = "deleteH.php?dd=" + deletesuprem;
    deleteA.click();
  } else {
    console.log(false);
    return false;
  }
}
