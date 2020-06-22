import React from 'react'
import { Link } from 'react-router-dom'

const Header = () => (
    <nav className='navbar navbar-expand-md navbar-dark navbar-laravel bg-dark' style={{ position: "sticky", top: "0", zIndex: "999" }}>
        <div className='container'>
            <Link className='navbar-brand' to='/'>Easybet</Link>
            <nav aria-label="breadcrumb">
                <ol className="breadcrumb bg-dark">
                    <li className="breadcrumb-item"><a href="#">Home</a></li>
                    {/* <li className="breadcrumb-item"><a href="#">Matches</a></li> */}
                    <li className="breadcrumb-item active" aria-current="page">Matches</li>
                </ol>
            </nav>
            <Link className='navbar-brand' to='/admin'>Admin</Link>
        </div>
    </nav>
)

export default Header