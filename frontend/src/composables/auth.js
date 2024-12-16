import axios from "axios";

export default function useAuth() {
    const setXsrfToken = async () => {
        await axios.get("/sanctum/csrf-cookie");
    };

    const login = async (email, password) => {
        await setXsrfToken();
        await axios.post("/login", {
            email: email,
            password: password,
        });
    };

    const logout = async () => {
        await axios.post("/logout");
    };

    return { setXsrfToken, login, logout };
}