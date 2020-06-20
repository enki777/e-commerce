import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class MatchesCategoryList extends Component {
    constructor(props) {
        super(props)
        this.state = {
            available: [],
            finished: []
        }
    }

    componentDidMount() {
        const CategoryId = this.props.match.params.id

        axios.get(`/api/matches/category/${CategoryId}`).then(response => {
            this.setState({
                available: JSON.parse(response.data[0]),
                finished: JSON.parse(response.data[1])
            })
        })
    }

    render() {
        const { available,finished } = this.state

        return (
            <div className='container-fluid'>
                <div className='row justify-content-center'>
                    <div className='col-8'>
                        <table className="table table-dark rounded mt-5">
                            <thead>
                                <tr>
                                    <th scope="col" className="border-top-0">Openning</th>
                                    <th scope="col">Matches</th>
                                    <th scope="col">Game</th>
                                </tr>
                            </thead>
                            <tbody>
                                {available.map(matchesA => (
                                    <tr key={matchesA.id}>
                                        <td className="text-success">{matchesA.openning}</td>
                                        <td>{matchesA.name}</td>
                                        <td>{matchesA.gameName}</td>
                                        <td>{matchesA.team1.name}</td>
                                        <td className="text-primary">{matchesA.days} days left</td>
                                        <td>{matchesA.team2.name}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>

                        <table className="table table-dark rounded mt-5">
                            <thead>
                                <tr>
                                    <th scope="col" className="border-top-0">Openning</th>
                                    <th scope="col">Matches</th>
                                    <th scope="col">Game</th>
                                </tr>
                            </thead>
                            <tbody>
                                {finished.map(matches => (
                                    <tr key={matches.id}>
                                        <td className="text-danger">{matches.openning}</td>
                                        <td>{matches.name}</td>
                                        <td>{matches.gameName}</td>
                                        <td>{matches.team1.name}</td>
                                        <td className="text-primary">{matches.days} days left</td>
                                        <td>{matches.team2.name}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div >
            </div>
        )
    }
}

export default MatchesCategoryList
