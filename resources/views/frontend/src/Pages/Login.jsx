import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import './Login.css'; // Optional CSS for styling

function Login() {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const handleLogin = () => {
    // Placeholder logic for login
    if (username && password) {
      alert('Login successful');
      // Navigate to a different page after successful login (e.g., dashboard)
      navigate('/');
    } else {
      alert('Please enter both username and password');
    }
  };

  return (
    <div className="login-container">
      <h1>Login</h1>
      <form className="login-form" onSubmit={(e) => e.preventDefault()}>
        <div className="form-group">
          <label htmlFor="username">Username</label>
          <input
            type="text"
            id="username"
            value={username}
            onChange={(e) => setUsername(e.target.value)}
            placeholder="Enter your username"
          />
        </div>
        <div className="form-group">
          <label htmlFor="password">Password</label>
          <input
            type="password"
            id="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            placeholder="Enter your password"
          />
        </div>
        <button type="submit" onClick={handleLogin}>
          Login
        </button>
      </form>
      <p>
        If you're not registered, <span onClick={() => navigate('/register')} className="register-link">REGISTER here</span>
      </p>
    </div>
  );
}

export default Login;
