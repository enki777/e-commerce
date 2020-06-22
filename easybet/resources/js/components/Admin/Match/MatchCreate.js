import React, { Component } from 'react';
import axios from 'axios';

export default class MatchCreate extends Component {
    constructor(props) {
        super(props);
        this.state = {
            games: [],
            team1: [],
            team2: []
        };
    }

    componentDidMount() {
        axios.get('/api/admin/match/create').then(res => {
            // console.log(res.data)
            this.setState({
                games: res.data[0],
                team1: res.data[1],
                team2: res.data[2],
            });
        });
    }

    render() {
        return (
            <div className={'container'}>
                <div className={'row justify-content-center'}>
                    <div className={'col-8'}>
                        <div className={'card'}>
                            <div className={'card-header'}>
                                <h1 className={'card-title'}>
                                    Create a Match
                                </h1>
                            </div>
                            <div className={'card-body'}>
                                <form method={'post'} action={'/api/admin/match/store'}>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Name</label>
                                        <div className={'col-6'}>
                                            <input className={'form-control'} type={'text'} name={'name'} />
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Choose a Game</label>
                                        <div className={'col-6'}>
                                            <select className={'form-control'} name={'games_id'}>
                                                {this.state.games.map(game => (
                                                    <option key={game.id} value={game.id}>{game.name}</option>
                                                ))}
                                            </select>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Choose a Team</label>
                                        <div className={'col-6'}>
                                            <select className={'form-control'} name={'teams_id'}>
                                                {this.state.team1.map(team => (
                                                    <option key={team.id} value={team.id}>{team.name}</option>
                                                ))}
                                            </select>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Choose a second Team</label>
                                        <div className={'col-6'}>
                                            <select className={'form-control'} name={'teams2_id'}>
                                                {this.state.team2.map(team => (
                                                    <option key={team.id} value={team.id}>{team.name}</option>
                                                ))}
                                            </select>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Choose an openning Date</label>
                                        <div className={'col-6'}>
                                            <input className={'form-control'} type="datetime-local" name="openning"
                                                min="2020-06-20" max="2040-01-01" step="1"
                                                defaultValue="2020-06-20T12:30:00" />
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <div className={'col-6 offset-4'}>
                                            <button className={'btn btn-primary'}>
                                                Create
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div className='card-footer'>
                                <a href='/admin'>Back to dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
