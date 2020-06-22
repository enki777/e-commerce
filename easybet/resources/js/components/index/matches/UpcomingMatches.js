import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class UpcomingMatches extends Component {
    constructor() {
        super()
        this.state = {
            upcoming: [],
        }
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                upcoming: response.data['upcoming'],
            })
        })
    }

    render() {
        const { upcoming } = this.state

        return (
            <div>
                <div className="card bg-dark border rounded-bottom border-primary ">
                    <div className="card-header text-white ">
                        <div className="btn-group dropright float-right">
                            <button className="btn btn-primary btn-sm dropdown-toggle text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filters
                                </button>
                            <div className="dropdown-menu bg-dark">
                                <a className="dropdown-item text-primary" href="#">Categories</a>
                                <a className="dropdown-item text-primary" href="#">Games</a>
                                <a className="dropdown-item text-primary" href="#">Teams</a>
                                <a className="dropdown-item text-primary" href="#">Openning date</a>
                                <div className="dropdown-divider border-primary"></div>
                                <a className="dropdown-item text-primary" href="#">Betting odds</a>
                            </div>
                        </div>
                    </div>
                    <div className="card-body ">
                        <table className="table table-striped table-bordered table-dark">
                            <thead>
                                <tr >
                                    <th scope="col" className="border border-right-0 border-info ">Openning</th >
                                    <th scope="col" className="border border-left-0 border-right-0 border-info">Name</th>
                                    <th scope="col" className="border border-left-0 border-right-0 border-info">Game</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-info">Team 1</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-info">betting odds T1</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-info">Score</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-info">betting odds T2</th>
                                    <th scope="col" className="border border-left-0 border-info">Team 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                {upcoming.map(match => (
                                    <tr key={match.id}>
                                        <td>
                                            {match.openning}
                                        </td>
                                        <td>{match.name}</td>
                                        <td>{match.games.name}</td>
                                        <td>{match.team1.name}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{match.team2.name}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        )
    }
}

export default UpcomingMatches