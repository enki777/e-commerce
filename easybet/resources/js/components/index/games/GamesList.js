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
                games: response.data[2],
            })
        })
    }

    render() {
        const games = this.state.games
        // console.log(categories)
        return (
            <div className="card bg-dark">
                <div className="card-header text-white">
                    <h3>Games</h3>
                </div>
                <div className="card-body">
                    <ul className="list-group">
                        {games.map(game => (
                            <Link
                                className="list-group-item bg-dark text-primary text-decoration-none list-unstyled"
                                to={`/matches/game/${game.id}`}
                                key={game.id}
                            >
                                <li key={game.id}>{game.name}</li>
                            </Link>
                        ))}
                    </ul>
                </div>
            </div>
        )
    }
}

export default GamesList