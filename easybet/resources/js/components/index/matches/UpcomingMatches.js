import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class UpcomingMatches extends Component {
    constructor() {
        super()
        this.state = {
            upcoming: [],
            value: ''
        }
        this.handleChange = this.handleChange.bind(this);
        // this.handleSubmit = this.handleSubmit.bind(this);
    }
    handleChange(event) {
        this.setState({ value: event.target.value });
    }

    // handleSubmit(event) {
    //     event.preventDefault();

    //     axios.get('/api/matches/bet/')
    //         .then(res => {
    //             const persons = res.data;
    //             this.setState({ persons });
    //         })
    // }

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
                                    {/* <th scope="col" className="border  border-right-0 border-left-0 border-info">betting odds T1</th> */}
                                    <th scope="col" className="border  border-right-0 border-left-0 border-info">VS</th>
                                    {/* <th scope="col" className="border  border-right-0 border-left-0 border-info">betting odds T2</th> */}
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
                                        <td>
                                            <button type="button" className="btn btn-primary" style={{ width: "200px" }} data-toggle="modal" data-target="#staticBackdrop">
                                                <span>{match.team1.name}</span>
                                            </button>
                                            <div className="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div className="modal-dialog modal-dialog-centered">
                                                    <div className="modal-content">
                                                        <div className="modal-header">
                                                            <h5 className="modal-title" id="staticBackdropLabel" className="text-dark">Bet</h5>
                                                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action={`/api/matches/bet/${match.team1.id}`}>
                                                            <div className="modal-body">
                                                                <span className="text-primary">Match : {match.name}</span><br />
                                                                <span className="text-primary">Team : {match.team1.name}</span>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="amount" aria-label="Amount (to the nearest dollar)" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">.00</span>
                                                                    </div>
                                                                </div>
                                                                {/* <input class="form-control form-control-sm" type="number"
                                                                    step="0.1" name="amount" value={this.state.value}  onChange={this.handleChange} placeholder="Amount" /> */}
                                                            </div>
                                                            <div className="modal-footer">
                                                                <button type="button" className="btn btn-secondary" data-dismiss="modal">Abort</button>
                                                                <button type="submit" className="btn btn-primary">Confirm</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button type="button" className="btn btn-primary" style={{ width: "200px" }} data-toggle="modal" data-target="#staticBackdrop">
                                                <span>{match.team2.name}</span>
                                            </button>
                                            <div className="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div className="modal-dialog modal-dialog-centered">
                                                    <div className="modal-content">
                                                        <div className="modal-header">
                                                            <h5 className="modal-title" id="staticBackdropLabel" className="text-dark">Bet</h5>
                                                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div className="modal-body" className="text-primary">
                                                            <span className="text-primary">Match : {match.name}</span><br />
                                                            <span className="text-primary">Team : {match.team2.name}</span>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">$</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="amount" aria-label="Amount (to the nearest dollar)" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="modal-footer">
                                                            <button type="button" className="btn btn-secondary" data-dismiss="modal">Abort</button>
                                                            <button type="button" className="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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