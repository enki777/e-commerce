import React, { Component } from 'react';
import axios from 'axios';

export default class Match extends Component {
    constructor(props) {
        super(props);
        this.state = {
            matches: [],
            deletedMatches: [],
        };
    }

    componentDidMount() {
        axios.get('/api/admin').then(res => {
            console.log(res.data)
            this.setState({
                matches: res.data['matches'],
                deletedMatches: res.data['deletedMatches']
            });
        });
    }

    render() {
        return (
            <div className={'card'}>
                <div className={'card-header'}>
                    <h4 className={'card-title'}>
                        Manage Matches
                    </h4>
                </div>
                <div className={'card-body'}>
                    <table className={'table table-bordered table-striped'}>
                        <thead>
                            <tr>
                                <th className={'align-middle'}>Date</th>
                                <th className={'align-middle'}>Match</th>
                                <th className={'align-middle'}>Game</th>
                                <th className={'align-middle'}>Team 1</th>
                                <th className={'align-middle'}>VS</th>
                                <th className={'align-middle'}>Team 2</th>
                                <th>
                                    <a href={'/admin/match/create'}>
                                        <button className={'btn btn-primary'}>
                                            Create Match
                                    </button>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {this.state.matches.map(match => (
                                <tr key={match.id}>
                                    <td className={'align-middle'}>{match.openning}</td>
                                    <td className={'align-middle'}>{match.name}</td>
                                    <td className={'align-middle'}>{match.games.name}</td>
                                    <td className={'align-middle'}>{match.team1.name}</td>
                                    <td className={'align-middle'}>VS</td>
                                    <td className={'align-middle'}>{match.team2.name}</td>
                                    <td className={'align-middle'}>
                                        <div className={'float-right'}>
                                            <a href={`/admin/match/${match.id}`}>
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
                                            <a href={`/admin/match/edit/${match.id}`}>
                                                <svg className="bi bi-pencil-square" width="1.5em"
                                                    height="1.5em"
                                                    viewBox="0 0 16 16" fill="green"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fillRule={'evenodd'}
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </a>

                                            <form id={'delete-category'}
                                                method={'post'}
                                                action={`/api/admin/match/delete/${match.id}`}>

                                                <button type="submit" className="border-0 bg-transparent">
                                                    <svg className="bi bi-trash ml-2 mr-2" width="1.5em"
                                                        height="1.5em"
                                                        viewBox="0 0 16 16" fill="red"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fillRule={'evenodd'}
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </button>
                                                <input type={'hidden'} name={'_method'}
                                                    value={'DELETE'} />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                    <br />
                    <div className="card-header border rounded">
                        <h3> Deleted matches</h3>
                    </div>
                    <div className="card-body">
                        <table className={'table table-bordered table-striped'}>
                            <thead>
                                <tr>
                                    <th className={'align-middle'}>Date</th>
                                    <th className={'align-middle'}>Match</th>
                                    <th className={'align-middle'}>Game</th>
                                    <th className={'align-middle'}>Team 1</th>
                                    <th className={'align-middle'}>VS</th>
                                    <th className={'align-middle'}>Team 2</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {this.state.deletedMatches.map(match => (
                                    <tr key={match.id}>
                                        <td className={'align-middle'}>{match.openning}</td>
                                        <td className={'align-middle'}>{match.name}</td>
                                        <td className={'align-middle'}>{match.games.name}</td>
                                        <td className={'align-middle'}>{match.team1.name}</td>
                                        <td className={'align-middle'}>VS</td>
                                        <td className={'align-middle'}>{match.team2.name}</td>
                                        <td className={'align-middle d-flex justify-content-between border-0'}>
                                            <form
                                                method={'post'}
                                                action={`/api/admin/match/restore/${match.id}`}>
                                                <button className={'btn btn-success'}>
                                                    Restore Match
                                                </button>
                                                <input type={'hidden'} name={'_method'}
                                                    value={'PUT'} />
                                            </form>
                                            <form
                                                method={'post'}
                                                action={`/api/admin/match/force/${match.id}`}>

                                                <button className={'btn btn-danger'}>
                                                    ForceDelete Match
                                                </button>
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
            </div >

        );
    }
}
