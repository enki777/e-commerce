import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class MatchesList extends Component {
    constructor() {
        super()
        this.state = {
            available: [],
            finished: []
        }
    }

    componentDidMount() {
        axios.get('/api/matches').then(response => {
            // console.log(response.data)
            this.setState({
                available: JSON.parse(response.data[0]),
                finished: JSON.parse(response.data[1])
            })
        })
    }

    render() {
        const { available } = this.state
        const { finished } = this.state
        return (
            <div className='container-fluid'>
                <div className='row justify-content-center'>
                    <div className='col-8'>
                        <h1>All Available matches</h1>
                        <table className="table table-dark rounded">
                            {console.log(available)}
                            {console.log(finished)}

                            <thead>
                                <tr>
                                    <th scope="col" className="border-top-0">Openning</th>
                                    <th scope="col">Matches</th>
                                    <th scope="col">Game</th>
                                </tr>
                            </thead>
                            <tbody>
                                {available.map(match => (
                                    <tr>
                                        <td className="text-success">{match.openning}</td>
                                        <td>{match.matchName}</td>
                                        <td>{match.gameName}</td>
                                        <td>{match.team1}</td>
                                        <td className="text-primary">{match.days} days left</td>
                                        <td>{match.team2}</td>
                                        <td><Link
                                            className='btn btn-primary'
                                            to={`/${match.id}`}
                                            key={match.id}
                                        >Details
                                        </Link>
                                        </td>
                                    </tr>
                                ))}
                                {/* <tr><th>Finished matches</th></tr>
                                {finished.map(match => (
                                    <tr>
                                        <td>{match.openning}</td>
                                        <td>{match.name}</td>
                                       <td>Team 1 name</td>
                                        <td>{match.days} days left</td>
                                        <td>Team 2 name</td>
                                    </tr>
                                ))} */}
                            </tbody>
                        </table>
                        <h1>All Finished matches</h1>
                        <table className="table table-dark rounded">
                            <thead>
                                <tr>
                                    <th scope="col" className="border-top-0">Openning</th>
                                    <th scope="col">Matches</th>
                                    <th scope="col">Game</th>
                                </tr>
                            </thead>
                            <tbody>
                                {finished.map(match => (
                                    <tr>
                                        <td className="text-danger">{match.openning}</td>
                                        <td>{match.matchName}</td>
                                        <td>{match.gameName}</td>
                                        <td>{match.team1}</td>
                                        <td className="text-primary">{match.days} days left</td>
                                        <td>{match.team2}</td>
                                        <td><Link
                                            className='btn btn-primary'
                                            to={`/${match.id}`}
                                            key={match.id}
                                        >Details
                                        </Link>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div >
        )
    }
}

export default MatchesList