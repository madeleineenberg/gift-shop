import React, { useContext, useEffect } from 'react';
import { useHistory } from 'react-router-dom';
import { PersonContext } from '../contexts/PersonContext';

export default function InterestPage() {
  const { setPersonList, personList, correctStarted } =
    useContext(PersonContext);
  const history = useHistory();

  useEffect(() => {
    if (!correctStarted) {
      history.push('/');
    }
  }, []);

  const handleOnSubmit = (e) => {
    e.preventDefault();
    if (document.querySelector('input[name=interest]:checked')) {
      history.push('/relations');
    } else {
      return;
    }
    console.log(personList);
  };

  return (
    <div className='app-container'>
      <h2 className='subtitle'> Select Interest</h2>
      <form onSubmit={handleOnSubmit}>
        <div>
          <input
            type='radio'
            name='interest'
            value='a'
            className='interestRadio'
            onChange={(e) =>
              setPersonList(
                personList ? personList + e.target.value : e.target.value
              )
            }
          />
          <label>Fashion 👠</label>
        </div>
        <div>
          <input
            type='radio'
            name='interest'
            value='b'
            className='interestRadio'
            onChange={(e) =>
              setPersonList(
                personList ? personList + e.target.value : e.target.value
              )
            }
          />
          <label>Tech 💻</label>
        </div>
        <div>
          <input
            type='radio'
            name='interest'
            value='c'
            className='interestRadio'
            onChange={(e) =>
              setPersonList(
                personList ? personList + e.target.value : e.target.value
              )
            }
          />
          <label>Craft 🧶 </label>
        </div>
        <button type='submit'>Next</button>
      </form>
    </div>
  );
}
