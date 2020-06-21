import React, { Component } from 'react';
import axios from 'axios';

export default class Register extends Component {
    constructor(props) {
        super(props);
        this.state = {
            username: '',
            first_name: '',
            last_name: '',
            birthday: '',
            address: '',
            city: '',
            email: '',
            password: '',
            password_confirmation: '',
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value,
        })
    }

    handleSubmit(event) {
        const { username, first_name, last_name, birthday, address, city, email, password, password_confirmation } = this.state;
        // VERIF
        axios.post('/api/register', this.state);

        event.preventDefault();
    }

    render() {
        return (
            <div className='container'>
                <div className='row justify-content-center'>
                    <div className='col-8'>
                        <div className='card'>
                            <div className='card-header'>
                                <h1 className='card-title'>Sign up</h1>
                            </div>
                            <div className='card-body'>
                                <form onSubmit={this.handleSubmit}>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>Username</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='text' name='username' onChange={this.handleChange} value={this.state.username} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>First name</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='text' name='first_name' onChange={this.handleChange} value={this.state.first_name} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>Last name</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='text' name='last_name' onChange={this.handleChange} value={this.state.last_name} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>Birthday</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='date' name='birthday' onChange={this.handleChange} value={this.state.birthday} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>Address</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='text' name='address' onChange={this.handleChange} value={this.state.address} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>City</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='text' name='city' onChange={this.handleChange} value={this.state.city} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>E-mail address</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='email' name='email' onChange={this.handleChange} value={this.state.email} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>Password</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='password' name='password' onChange={this.handleChange} value={this.state.password} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <label className='col-4 col-form-label text-right'>Password confirmation</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='password' name='password_confirmation' onChange={this.handleChange} value={this.state.password_confirmation} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <div className='col-6 offset-4'>
                                            <button className='btn btn-primary'>
                                                Sign up
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}