// Importar los módulos de Firebase
import { getAuth, signInWithEmailAndPassword, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.0.0/firebase-auth.js";
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js";

// Configuración de Firebase
const firebaseConfig = {
    apiKey: "AIzaSyATeflh8BejvKSAe2o8RSCXa43y6TGDrzA",
    authDomain: "ecommerce-d2ded.firebaseapp.com",
    projectId: "ecommerce-d2ded",
    storageBucket: "ecommerce-d2ded.appspot.com",
    messagingSenderId: "653305869950",
    appId: "1:653305869950:web:661595f3b0a72d5cf40a2f",
    measurementId: "G-2GZBMQ6JMZ"
};

// Inicializar Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Elementos del DOM
const txtEmail = document.getElementById('correo');
const txtPassword = document.getElementById('pass');
const btnLogin = document.getElementById('login');

// Lógica de inicio de sesión
btnLogin.addEventListener('click', (e) => {
    e.preventDefault(); // Evitar el comportamiento predeterminado del botón
    const email = txtEmail.value;
    const pass = txtPassword.value;

    signInWithEmailAndPassword(auth, email, pass)
        .then((userCredential) => {
            // Redirigir a la página admin
            location.href = "admin"; // Asegúrate de que esta ruta sea correcta
        })
        .catch((error) => {
            console.error("Error de inicio de sesión:", error.code, error.message);
            alert("Error: " + error.message); // Muestra un mensaje de error
        });
});

// Verificación del estado de autenticación
onAuthStateChanged(auth, (user) => {
    if (user) {
        location.href = "admin"; // Redirigir si el usuario está autenticado
    }
});