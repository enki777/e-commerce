import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class GamesList extends Component {
    constructor() {
        super()
        this.state = {
            games: [],
        }
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                games: response.data['games'],
            })
        })
    }

    render() {
        const games = this.state.games
        return (
            <div className="card bg-dark border border-success  ">
                <div className="card-header" id="headingOne">
                    <h2 className="mb-0">
                        <button className="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span className="text-success ">Games</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" className="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div className="card-body">
                        {games.map(game => (
                            <Link
                                className="list-group-item bg-dark text-success text-decoration-none list-unstyled"
                                to={`/matches/game/${game.id}`}
                                key={game.id}
                            >
                                <li key={game.id}>
                                    <div className="d-flex justify-content-between">
                                        {/* <img src={`/storage/${game.image}`} className={'bg-transparent p-0 rounded'} width={'40'}
                                            alt={'game'} /> */}
                                        <p>{game.name}</p>
                                    </div>
                                </li>
                            </Link>
                        ))}

                    </div>
                </div>
            </div>
        )
    }
}

export default GamesList