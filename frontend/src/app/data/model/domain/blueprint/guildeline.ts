import { Workshop } from '@model/domain/blueprint/workshop';
import { Uuid } from '@model/shared/uuid';

export interface Guildeline {
  id: Uuid;
  steps: Workshop[];
}
