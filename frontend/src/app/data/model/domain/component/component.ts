import { Type } from '@model/domain/component/type';
import { Uuid } from '@model/shared/uuid';

export interface Component {
  id: Uuid;
  reference: string;
  type: Type;
  description: string;
}
