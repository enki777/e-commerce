import axios from 'axios'
import React, { Component } from 'react'

class SingleProject extends Component {
    constructor(props) {
        super(props)
        this.state = {
            match: {},
            games: [],
            team1: [],
            team2: [],
        }
    }

    componentDidMount() {
        const MatchId = this.props.match.params.id

        axios.get(`/api/matches/${MatchId}`).then(response => {

            this.setState({
                match: response.data,
                games: response.data.games,
                team1: response.data.team1,
                team2: response.data.team2
            })
        })
    }

    render() {
        const { match, games,team1,team2 } = this.state

        return (
            <div className='container-fluid'>
                <div className='row justify-content-center'>
                    <div className='col-8 pt-5'>
                        <table className="table table-dark rounded">
                            <thead>
                                <tr>
                                    <th scope="col" className="border-top-0">Openning</th>
                                    <th scope="col">Matches</th>
                                    <th scope="col">Game</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td className="text-success">{match.openning}</td>
                                    <td>{match.name}</td>
                                    <td>{games.name}</td>
                                    <td>{team1.name}</td>
                                    <td className="text-primary">{match.days} days left</td>
                                    <td>{team2.name}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        )
    }
}

export default SingleProject
