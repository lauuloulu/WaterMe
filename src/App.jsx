import React from 'react';
import './App.css';
import daisy from '../src/assets/img/daisy.png';

function App() {
    return (
        <div className="login-container">
            <div className="daisy" style={{ backgroundImage: `url(${daisy})` }}></div>
            <button className="login-button">Iniciar sesión</button>
        </div>
    );
}

export default App;
