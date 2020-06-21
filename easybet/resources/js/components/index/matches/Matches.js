import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class Matches extends Component {
    constructor() {
        super()
        this.state = {
            available: [],
            finished: [],
        }
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                available: response.data[0],
                finished: response.data[1],
            })
        })
    }

    render() {
        const { available } = this.state
        const { finished } = this.state

        return (
            <div>
                <div className="card bg-dark">
                    <div className="card-header text-primary">
                        <h3 className="float-left">All available matches</h3>
                    </div>
                    <div className="card-body">
                        <ul className='list-group'>
                            {available.map(match => (
                                <Link
                                    className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                    to={`/matches/${match.id}`}
                                    key={match.id}
                                >
                                    <p className="list-group-item">{match.openning}</p>
                                    <p>{match.name}</p>
                                    <p>{match.games.name}</p>
                                    <p>{match.team1.name}</p>
                                    <p>VS</p>
                                    <p>{match.team2.name}</p>

                                    <span className='badge badge-primary badge-pill p-2'>
                                        {match.days} days left
                                            </span>

                                </Link>
                            ))}
                        </ul>
                    </div>
                </div>
                <div className="card bg-dark mt-2">
                    <div className="card-header text-danger">
                        <h3>All finished matches</h3>
                    </div>
                    <div className="card-body">
                        <ul className='list-group'>
                            {finished.map(match => (
                                <Link
                                    className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                    to={`/${match.id}`}
                                    key={match.id}
                                >
                                    <p className="list-group-item">{match.openning}</p>
                                    <p>{match.name}</p>
                                    <p>{match.team1.name}</p>
                                    <p>VS</p>
                                    <p>{match.team2.name}</p>

                                    <span className='badge badge-primary badge-pill p-2'>
                                        {match.days} days left
                                            </span>

                                </Link>
                            ))}
                        </ul>
                    </div>
                </div>
            </div>
        )
    }
}

export default Matches