toggleProfile = () => {
  let x = document.getElementById("edition");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}

toProfilePage = () => {
  location.replace('./profile/profile.php')
}
toCarAddPage = () => {
  location.replace('./car-add/car-add.php')
}
toCarViewPage = () => {
  location.replace('./car-view/car-list.php')
}