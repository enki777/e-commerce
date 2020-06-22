import React, { Component } from 'react';
import axios from 'axios';

export default class Login extends Component {
    constructor(props) {
        super(props);
        this.state = {
            username: '',
            password: '',
        }
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value,
        });
    }

    handleSubmit(event) {
        // componentDidMount() {
            axios.post('/api/matches')
                .then(res => {
                    // const persons = res.data;
                    // this.setState({ persons });
                })
        // }
        // event.preventDefault();
    }

    render() {
        return (
            <div className='container'>
                <div className='row justify-content-center'>
                    <div className='col-8'>
                        <div className='card'>
                            <div className='card-header'>
                                <h1 className='card-title'>Sign in</h1>
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
                                        <label className='col-4 col-form-label text-right'>Password</label>
                                        <div className='col-6'>
                                            <input className='form-control' type='password' name='password' onChange={this.handleChange} value={this.state.password} />
                                        </div>
                                    </div>
                                    <div className='form-group row'>
                                        <div className='col-6 offset-4'>
                                            <button className='btn btn-primary'>
                                                Sign in
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