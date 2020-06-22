import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class CurrentMatches extends Component {
    constructor() {
        super()
        this.state = {
            CurrentMatches: [],
        }
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                CurrentMatches: response.data['currentMatches'],
            })
        })
    }

    render() {
        const { CurrentMatches } = this.state

        return (
            <div>
                <div className="card bg-dark border border-success" >
                    <div className="card-header text-primary ">
                        <div className="btn-group dropup float-right">
                            <button className="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filter by
                                </button>
                            <div className="dropdown-menu mb-2">
                                <select className="dropdown-item text-success d-flex justify-content-center" value={this.state.value} onChange={this.handleChange}>
                                    <option className="dropdown-item" defaultValue="categories">Categories</option>
                                    <option className="dropdown-item" defaultValue="lime">Games</option>
                                    <option className="dropdown-item" defaultValue="coconut">Teams</option>
                                    <option className="dropdown-item" defaultValue="mango">Openning Date</option>
                                </select>
                                <div className="dropdown-divider"></div>
                                <button type="submit" className="btn btn-success ml-2">Up</button>
                                <button type="submit" className="btn btn-success ml-2">Down</button>
                            </div>
                        </div>

                    </div>
                    <div className="card-body ">
                        <table className="table table-striped table-bordered table-dark">
                            <thead>
                                <tr >
                                    <th scope="col" className="border border-right-0 border-success ">Openning</th >
                                    <th scope="col" className="border border-left-0 border-right-0 border-success">Name</th>
                                    <th scope="col" className="border border-left-0 border-right-0 border-success">Game</th>
                                    <th scope="col" className="border  border-right-0 border-left-0 border-success">Team 1</th>
                                    {/* <th scope="col" className="border  border-right-0 border-left-0 border-success">betting odds T1</th> */}
                                    <th scope="col" className="border  border-right-0 border-left-0 border-success">VS</th>
                                    {/* <th scope="col" className="border  border-right-0 border-left-0 border-success">betting odds T2</th> */}
                                    <th scope="col" className="border border-left-0 border-success">Team 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                {CurrentMatches.map(match => (
                                    <tr key={match.id}>
                                        <td>
                                            {match.openning}
                                        </td>
                                        <td>{match.name}</td>
                                        <td>{match.games.name}</td>
                                        <td>{match.team1.name}</td>
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

export default CurrentMatches