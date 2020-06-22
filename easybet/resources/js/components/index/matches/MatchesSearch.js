import axios from 'axios'
import React, { Component, forwardRef } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'
import CategoriesList from '../categories/CategoriesList'
import GamesList from '../games/GamesList'


class MatchesSearch extends Component {
    constructor() {
        super()
        this.state = {
            games: [],
            teams: [],
            categories: [],
            value: '',
            // finished: [],
        }
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        this.setState({ value: event.target.value });
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                games: response.data['games'],
                teams: response.data['teams'],
                categories: response.data['categories'],
            })
        })
    }

    render() {
        const { games, teams, categories, value } = this.state
        return (
            <div>
                <form action={`/matches/search/${value}`} method="GET">
                    <div className="card bg-dark mt-5" >
                        <div className="card-header">
                            <h4 className="text-success">Matches Research</h4>
                        </div>
                        <div className="card-body">
                            <div className="form-group">
                                <input type="text" className="form-control" value={this.state.value} onChange={this.handleChange} id="inputPassword2" placeholder="Type a match" />
                            </div>
                            <select className="form-control form-control-sm">
                                <option defaultValue disabled>Choose a Team</option>
                                {teams.map(team => (
                                    <option key={team.id} defaultValue={team.id}>{team.name}</option>
                                ))}
                            </select>
                            <br />
                            <h4 className="text-success border-bottom border-success">Choose categories</h4>
                            {categories.map(category => (
                                <div key={category.id} className="form-check">
                                    <input className="form-check-input" type="checkbox" defaultValue={category.id} key={category.id} />
                                    <label className="form-check-label text-success">{category.name}</label>
                                </div>
                            ))}
                        </div>
                        <div className="card-footer">
                            <button type="submit" className="btn btn-success">
                                Search
                            </button>
                            {/* <input type={'hidden'} name={'_method'}
                                value={'GET'} /> */}
                        </div>
                    </div>
                </form>
            </div>
        )
    }
}

export default MatchesSearch
