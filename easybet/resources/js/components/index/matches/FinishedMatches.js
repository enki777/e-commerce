import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class FinishedMatches extends Component {
    constructor() {
        super()
        this.state = {
            finished: [],
            // nbMatches: 
            // finished: [],
        }
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            // console.log(response.data)
            this.setState({
                finished: response.data['finished'],
                // finished: response.data[1],
            })
        })
    }

    render() {
        const { finished } = this.state
        // const { finished } = this.state

        return (
            <div>
                <div className="card bg-dark border border-danger   ">
                    <div className="card-header text-primary ">
                        <a>
                            <button className="btn btn-danger float-left" type="button">
                                <span className="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                <span className="ml-1">Finished Matches </span>
                            </button>

                            <div className="btn-group float-right">
                                <button className="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Filters
                                </button>
                                <div className="dropdown-menu">
                                    <a className="dropdown-item" href="#">Categories</a>
                                    <a className="dropdown-item" href="#">Games</a>
                                    <a className="dropdown-item" href="#">Something else here</a>
                                    <div className="dropdown-divider"></div>
                                    <a className="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div className="card-body ">
                        <table className="table table-striped table-bordered table-dark">
                            <thead>
                                <tr >
                                    <th scope="col" className="border border-right-0 border-danger ">Openning</th >
                                    <th scope="col" className="border border-left-0 border-right-0 border-danger">Name</th>
                                    <th scope="col" className="border border-left-0 border-right-0 border-danger">Game</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-danger">Team 1</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-danger">betting odds T1</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-danger">Score</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-danger">betting odds T2</th>
                                    <th scope="col" className="border border-left-0 border-danger">Team 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                {/* {CurrentMatches} */}
                                {finished.map(match => (
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

export default FinishedMatches