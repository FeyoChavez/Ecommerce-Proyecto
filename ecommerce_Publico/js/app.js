// Firebase configuration
var config = {
  apiKey: "AIzaSyBJaPC62yPQdgLQQgISSvvt2WgwoOq86UU",
  authDomain: "ecommercepublico-9475b.firebaseapp.com",
  projectId: "ecommercepublico-9475b",
  storageBucket: "ecommercepublico-9475b.appspot.com",
  messagingSenderId: "612444200463",
  appId: "1:612444200463:web:0c0dbdbd1718e5b4668d7a",
  measurementId: "G-VWVD1BTHH7"
};

// Initialize Firebase
firebase.initializeApp(config);

// Google login
function IngresoGoogle() {
  if (!firebase.auth().currentUser) {
    var provider = new firebase.auth.GoogleAuthProvider();
    provider.addScope('https://www.googleapis.com/auth/plus.login');
    firebase.auth().signInWithPopup(provider).then(function(result) {
      var user = result.user;
      var name = user.displayName;
      var correo = user.email;
      var foto = result.user.photoURL;
      var googleId = result.user.displayName;
      //var foto = "https://graph.google.com" + googleId +"/picture?height=500"
      var red = 'Google';
      // Ajusta la ruta para que apunte al index.php de la carpeta inicio
      location.href = 'login/index.php?name=' + name + '&correo=' + correo + '&foto=' + foto + '&red=' + red;
    }).catch(function(error) {
      if (error.code === 'auth/account-exists-with-different-credential') {
        alert('El usuario ya existe con otra credencial.');
      }
    });
  } else {
    firebase.auth().signOut();
  }
}


document.getElementById('btn-Google').addEventListener('click', IngresoGoogle, false);

// Facebook login
function IngresoFacebook() {
  if (!firebase.auth().currentUser) {
    var provider = new firebase.auth.FacebookAuthProvider();
    provider.addScope('public_profile');
    firebase.auth().signInWithPopup(provider).then(function(result) {
      var user = result.user;
      var name = user.displayName;
      var correo = user.email;
      var foto = user.photoURL;
      var red = 'Facebook';
      location.href = 'login/index.php?name=' + name + '&correo=' + correo + '&foto=' + foto + '&red=' + red;
    }).catch(function(error) {
      if (error.code === 'auth/account-exists-with-different-credential') {
        alert('El usuario ya existe con otra credencial.');
      }
    });
  } else {
    firebase.auth().signOut();
  }
}

document.getElementById('btn-Facebook').addEventListener('click', IngresoFacebook, false);

// Twitter login
function IngresoTwitter() {
  if (!firebase.auth().currentUser) {
    var provider = new firebase.auth.TwitterAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
      var user = result.user;
      var name = user.displayName;
      var correo = 'no lo manda';
      var red = 'Twitter';
      location.href = 'inicio/index.php?name=' + name;
    }).catch(function(error) {
      if (error.code === 'auth/account-exists-with-different-credential') {
        alert('El usuario ya existe con otra credencial.');
      }
    });
  } else {
    firebase.auth().signOut();
  }
}

document.getElementById('btn-Twitter').addEventListener('click', IngresoTwitter, false);
