import React, { Component } from 'react';
import axios from 'axios';

export default class MatchEdit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            match: {},
            matchgames: [],
            matchteam1: [],
            matchteam2: [],

            games: [],
            team1: [],
            team2: [],
        };
    }


    componentDidMount() {
        const id = this.props.match.params.match
        axios.get(`/api/admin/match/edit/${id}`).then(res => {
            // console.log(res.data)
            this.setState({
                match: res.data[0],
                matchgames: res.data[0].games,
                matchteam1: res.data[0].team1,
                matchteam2: res.data[0].team2,

                games: res.data[1],
                team1: res.data[2],
                team2: res.data[3],
            });
        });
    }

    render() {
        const { match, matchgames, matchteam1, matchteam2, games, team1, team2 } = this.state
        // console.log(openning)
        return (
            <div className={'container'}>
                <div className={'row justify-content-center'}>
                    <div className={'col-8'}>
                        <div className={'card'}>
                            <div className={'card-header'}>
                                <h1 className={'card-title'}>
                                    Edit {match.name}
                                </h1>
                            </div>
                            <div className={'card-body'}>
                                <form method={'post'} action={`/api/admin/match/update/${match.id}`}>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Name</label>
                                        <div className={'col-6'}>
                                            <input className={'form-control'} type={'text'} name={'name'} defaultValue={match.name} />
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Choose a Game</label>
                                        <div className={'col-6'}>
                                            <select className={'form-control'} name={'games_id'}>
                                                <option key={matchgames.id} value={matchgames.id}>{matchgames.name}</option>
                                                {games.map(game => (
                                                    <option key={game.id} value={game.id}>{game.name}</option>
                                                ))}
                                            </select>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Choose a Team</label>
                                        <div className={'col-6'}>
                                            <select className={'form-control'} name={'teams_id'}>
                                                <option key={matchteam1.id} value={matchteam1.id}>{matchteam1.name}</option>
                                                {team1.map(team => (
                                                    <option key={team.id} value={team.id}>{team.name}</option>
                                                ))}
                                            </select>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Choose a second Team</label>
                                        <div className={'col-6'}>
                                            <select className={'form-control'} name={'teams2_id'}>
                                                <option key={matchteam2.id} value={matchteam2.id}>{matchteam2.name}</option>
                                                {team2.map(team => (
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
                                            />
                                            <span className="badge badge-success text-dark p-2 mt-1">The default date was : {match.openning}</span>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <div className={'col-6 offset-4'}>
                                            <button className={'btn btn-success'}>
                                                Update
                                            </button>
                                            <input type={'hidden'} name={'_method'}
                                                value={'PATCH'} />
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
