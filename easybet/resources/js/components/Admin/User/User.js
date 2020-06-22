import React, { Component } from 'react';
import axios from 'axios';

export default class User extends Component {
    constructor(props) {
        super(props);
        this.state = {
            users: [],
        };
    }

    componentDidMount() {
        axios.get('/api/admin').then(res => {
            this.setState({
                users: res.data['users'],
            });
        });
    }

    formatDate(date) {
        let a = new Date(date).toISOString().slice(0, 10);
        let b = new Date(date).toISOString().slice(11, 19);
        return `${a} ${b}`;
    }

    render() {
        return (
            <div className={'card rounded-0 border-right-0 border-bottom-0'}>
                <div className={'card-header text-center'}>
                    <h4 className={'card-title'}>Manage Users</h4>
                </div>
                <div className={'card-body'}>
                    {/* Coming soon ! */}
                    <table className='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th className='text-center'>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            {this.state.users.map(user => (
                                <tr key={user.id}>
                                    <td>{user.id}</td>
                                    <td>{user.username}</td>
                                    <td>{user.email}</td>
                                    <td>{this.formatDate(user.created_at)}</td>
                                    <td className='text-center'>
                                        <a href={`/admin/user/${user.id}`} data-toggle="tooltip" title="Show more details">
                                            <svg className="bi bi-eye mr-2" width="1.5em"
                                                height="1.5em"
                                                viewBox="0 0 16 16" fill="dark"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fillRule={'evenodd'}
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                <path fillRule={'evenodd'}
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </a>
                                        <a href={''} onClick={(event) => {
                                            event.preventDefault();
                                            document.getElementById(`delete-user-${user.id}`).submit();
                                        }} data-toggle="tooltip" title="Delete user">
                                            <svg className="bi bi-trash ml-2" width="1.5em"
                                                height="1.5em"
                                                viewBox="0 0 16 16" fill="red"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fillRule={'evenodd'}
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>
                                        <form className={'d-none'} id={`delete-user-${user.id}`}
                                            method={'post'}
                                            action={`/api/admin/user/delete/${user.id}`}>
                                            <input type={'hidden'} name={'_method'}
                                                value={'DELETE'} />
                                        </form>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
        );
    }
}
