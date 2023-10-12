const urlToken = new URLSearchParams(window.location.search);
const token = urlToken.get('token');
let decodedToken = {};
if (token) {
    try {
        decodedToken = JSON.parse(atob(token.split('.')[1]));
        if (!decodedToken.username) window.location.href = "./pages/index.php";
    } catch (error) {
        window.location.href = "./pages/index.php";
    }

} else window.location.href = "./pages/index.php";


