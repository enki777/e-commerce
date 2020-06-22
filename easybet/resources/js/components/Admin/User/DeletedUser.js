import React, { Component } from 'react';
import axios from 'axios';

export default class DeletedUser extends Component {
    constructor(props) {
        super(props);
        this.state = {
            dUsers: [],
        };
    }

    componentDidMount() {
        axios.get('/api/admin').then(res => {
            this.setState({
                dUsers: res.data['deleted_users'],
            });
        });
    }

    formatDate(date) {
        let a = new Date(date).toISOString().slice(0, 10);
        let b = new Date(date).toISOString().slice(11, 19);
        return `${a} ${b}`;
    }

    render() {
        const { dUsers } = this.state;
        return (
            <div className='card rounded-0 border-0'>
                <div className='card-header text-center rounded-0 border-right'>
                    <h4 className='card-title'>Manage Deleted Users</h4>
                </div>
                <div className='card-body'>
                    <table className='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Deleted At</th>
                                <th className='text-center'>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            {dUsers.map(dUser => (
                                <tr key={dUser.id}>
                                    <td>{dUser.id}</td>
                                    <td>{this.formatDate(dUser.deleted_at)}</td>
                                    <td className='text-center'>
                                        <a href='' onClick={(event) => {
                                            event.preventDefault();
                                            document.getElementById(`restore-user-${dUser.id}`).submit();
                                        }} data-toggle="tooltip" title="Restore a deleted user">
                                            <svg className="bi bi-arrow-left-circle" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="green" xmlns="http://www.w3.org/2000/svg">
                                                <path fillRule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path fillRule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z" />
                                                <path fillRule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z" />
                                            </svg>
                                        </a>
                                        <form className={'d-none'} id={`restore-user-${dUser.id}`}
                                            method={'post'}
                                            action={`/api/admin/user/restore/${dUser.id}`}>
                                            <input type={'hidden'} name={'_method'}
                                                value={'PATCH'} />
                                        </form>
                                        <a href={''} onClick={(event) => {
                                            event.preventDefault();
                                            if (confirm(`You are about to delete ${dUser.username}, are you sure ?`)) {
                                                document.getElementById(`force-delete-user-${dUser.id}`).submit();
                                            }
                                        }} data-toggle="tooltip" title="Remove a deleted user">
                                            <svg className="bi bi-trash-fill ml-2" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="red" xmlns="http://www.w3.org/2000/svg">
                                                <path fillRule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                            </svg>
                                        </a>
                                        <form className={'d-none'} id={`force-delete-user-${dUser.id}`}
                                            method={'post'}
                                            action={`/api/admin/user/remove/${dUser.id}`}>
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