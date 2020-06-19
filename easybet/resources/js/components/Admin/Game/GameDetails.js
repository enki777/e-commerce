import React, {Component} from 'react';
import axios from 'axios';

export default class GameDetails extends Component {
    constructor(props) {
        super(props);
        this.state = {
            game: {},
            categories: [],
        }
    }

    componentDidMount() {
        const id = this.props.match.params.id;
        axios.get(`/api/admin/game/${id}`).then(res => {
            this.setState({
                game: res.data,
                categories: res.data.categories,
            });
        });
    }

    render() {
        return (
            <div className={'container'}>
                <div className={'row justify-content-center'}>
                    <div className={'col-8'}>
                        <div className={'card'}>
                            <div className={'card-header'}>
                                <h1 className={'card-title'}>
                                    <img src={`/storage/${this.state.game.image}`} className={'img-thumbnail mr-2 mb-1'}
                                         width={50}/>
                                    {this.state.game.name}
                                </h1>
                            </div>
                            <div className={'card-body'}>
                                <div className={'row'}>
                                    <div className={'col-6'}>
                                        {this.state.categories.map(category => (
                                            <h3 key={category.id}>
                                                <span className={'badge badge-secondary'}>
                                                {category.name}
                                                </span>
                                            </h3>
                                        ))}
                                    </div>
                                    <div className={'col-3 text-right'}>
                                        <a href={`/admin/game/edit/${this.state.game.id}`}>
                                            <button className={'btn btn-success'}>
                                                Edit
                                                <svg className="bi bi-pencil-square ml-2 mb-1" width="1em" height="1em"
                                                     viewBox="0 0 16 16" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fillRule={"evenodd"}
                                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                    <div className={'col-3 text-left'}>
                                        <a href={''} onClick={(event) => {
                                            event.preventDefault();
                                            if (confirm(`You are about to delete ${this.state.game.name}, are you sure ?`)) {
                                                document.getElementById('delete-game').submit();
                                            }
                                        }}>
                                            <button className={'btn btn-danger'}>
                                                Delete
                                                <svg className="bi bi-trash ml-2 mb-1" width="1em" height="1em"
                                                     viewBox="0 0 16 16"
                                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fillRule={"evenodd"}
                                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button>
                                        </a>
                                        <form className={'d-none'} id={'delete-game'}
                                              method={'post'}
                                              action={`/api/admin/game/delete/${this.state.game.id}`}>
                                            <input type={'hidden'} name={'_method'}
                                                   value={'DELETE'}/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
