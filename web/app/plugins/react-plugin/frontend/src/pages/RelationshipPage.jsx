import React, { useContext, useEffect } from 'react';
import { useHistory } from 'react-router-dom';
import { PersonContext } from '../contexts/PersonContext';

export default function RelationshipPage() {
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
    if (document.querySelector('input[name=relations]:checked')) {
      history.push('/result');
    } else {
      return;
    }
    console.log(personList);
  };
  return (
    <div className='app-container'>
      <h2 className='subtitle'> Select Relationship</h2>
      <form onSubmit={handleOnSubmit}>
        <div>
          <input
            type='radio'
            name='relations'
            value='a'
            className='relationsRadio'
            onChange={(e) =>
              setPersonList(
                personList ? personList + e.target.value : e.target.value
              )
            }
          />
          <label>Parent 👩‍👧‍👦 </label>
        </div>
        <div>
          <input
            type='radio'
            name='relations'
            value='b'
            className='relationsRadio'
            onChange={(e) =>
              setPersonList(
                personList ? personList + e.target.value : e.target.value
              )
            }
          />
          <label>Sibling 👫 </label>
        </div>
        <div>
          <input
            type='radio'
            name='relations'
            value='c'
            className='relationsRadio'
            onChange={(e) =>
              setPersonList(
                personList ? personList + e.target.value : e.target.value
              )
            }
          />
          <label>Other 🐷 </label>
        </div>
        <button type='submit'>Next</button>
      </form>
    </div>
  );
}
