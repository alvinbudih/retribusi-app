// const tombolTambah = document.querySelector(".tombol-tambah")
// const tombolUbah = document.querySelector(".tombol-ubah")

// tombolTambah.addEventListener("click", function () {
//   document.getElementById("modal-judul").innerHTML = "Tambah Data"
//   document.querySelector(".modal-footer button[type=submit]").innerHTML = "Tambah Data"

//   document.querySelector(".modal-dialog form").setAttribute("action", `retribusi-app.test/dashboard/user/`)

//   document.getElementById("name").value = ""
//   document.getElementById("username").value = ""
//   document.getElementById("email").value = ""
// })

// tombolUbah.addEventListener("click", function () {
//   document.getElementById("modal-judul").innerHTML = "Ubah Data"
//   document.querySelector(".modal-footer button[type=submit]").innerHTML = "Ubah Data"
//   let id = tombolUbah.dataset.id
//   document.querySelector(".modal-dialog form").setAttribute("action", `http://retribusi-app.test/dashboard/user/${id}`)

//   fetch(`http://retribusi-app.test/api/user/${id}`)
//     .then(response => response.json())
//     .then(result => {
//       const user = result.data

//       document.getElementById("name").value = user.name
//       document.getElementById("username").value = user.username
//       document.getElementById("email").value = user.email
      
//       const roles = user.roles

//       for(let i = 0; i < roles.length; i++) {
//         if (document.getElementById("roles" + i).value == roles[i].id) {
          
//         }
//       }
//     })
// })