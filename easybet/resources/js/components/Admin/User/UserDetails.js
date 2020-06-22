import React, { Component } from 'react';
import axios from 'axios';
import { reject } from 'lodash';

export default class UserDetails extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: {},
        };
    }

    componentDidMount() {
        const id = this.props.match.params.id;
        axios.get(`/api/admin/user/${id}`).then(res => {
            this.setState({
                user: res.data,
            });
        });
    }

    render() {
        const { user } = this.state;
        return (
            <div className='container'>
                <div className='row'>
                    <div className='col-12'>
                        <div className='card'>
                            <div className='card-header'>
                                <h1 className='card-title'>User details</h1>
                            </div>
                            <div className='card-body'>
                                <table className='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>First name</th>
                                            <th colSpan={2}>Last name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{user.id}</td>
                                            <td>{user.username}</td>
                                            <td>{user.first_name}</td>
                                            <td colSpan={2}>{user.last_name}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Birthday</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{user.birthday}</td>
                                            <td>{user.address}</td>
                                            <td>{user.city}</td>
                                            <td>{user.email}</td>
                                            <td>{user.created_at}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href='/admin/user'>Back to dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}